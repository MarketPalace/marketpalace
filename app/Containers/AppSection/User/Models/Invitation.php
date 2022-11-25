<?php

declare(strict_types=1);

/**
 * Contains the Invitation class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2020-12-18
 *
 */

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\User\Enums\UserTypeProxy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Ship\Utils\CastsEnums;
use App\Containers\AppSection\User\Contracts\Invitation as InvitationContract;
use App\Containers\AppSection\User\Contracts\User as UserContract;
use App\Containers\AppSection\User\Contracts\UserType as UserTypeContract;
use App\Containers\AppSection\User\Events\UserInvitationCreated;
use App\Containers\AppSection\User\Events\UserInvitationUtilized;
use App\Containers\AppSection\User\Events\UserIsBeingCreatedFromInvitation;

/**
 * @property integer           $id
 * @property null|integer      $user_id
 * @property null|UserContract $user
 * @property null|string       $name
 * @property string            $email
 * @property string            $hash
 * @property UserTypeContract  $type
 * @property array             $options
 * @property Carbon            $expires_at
 * @property Carbon            $utilized_at
 * @property Carbon            $created_at
 * @property Carbon            $updated_at
 * @method static self create(array $attributes = [])
 */
class Invitation extends Model implements InvitationContract
{
    use CastsEnums;

    protected $table = 'invitations';

    protected $attributes = [
        'options' => '[]',
    ];

    protected $fillable = [
        'name', 'email', 'hash', 'type', 'options', 'expires_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'expires_at', 'utilized_at'];

    protected $casts = [
        'options' => 'json',
    ];

    protected $enums = [
        'type' => 'UserTypeProxy@enumClass'
    ];

    public static function createInvitation(
        string $email,
        string $name = null,
        ?UserTypeContract $type = null,
        array $options = [],
        ?int $expiresInDays = null
    ): self {
        $attributes = [
            'email'   => $email,
            'options' => $options
        ];

        if (null !== $name) {
            $attributes['name'] = $name;
        }

        if (null !== $type) {
            $attributes['type'] = $type;
        }

        if (null !== $expiresInDays) {
            $attributes['expires_at'] = Carbon::now()->addDays($expiresInDays);
        }

        $instance = self::create($attributes);
        event(new UserInvitationCreated($instance));

        return $instance;
    }

    public static function findByHash(string $hash): ?InvitationContract
    {
        return self::where('hash', $hash)->first();
    }

    public static function generateInvitationCode(): string
    {
        return Str::uuid()->getHex() . Str::uuid()->getHex() . Str::uuid()->getHex();
    }

    public function createUser(array $furtherAttributes = [], string $userClass = null, bool $dontEncryptPassword = false): UserContract
    {
        $attributes = array_merge([
            'email' => $this->email,
            'name'  => $this->name,
            'type'  => $this->type,
        ], $furtherAttributes);

        if (!$dontEncryptPassword && isset($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        }

        $userClass = $userClass ?? UserProxy::modelClass();
        /** @var Model $user */
        $user = new $userClass();
        $user->fill($attributes);

        event(new UserIsBeingCreatedFromInvitation($this, $user));

        $user->push();

        $this->user_id = $user->id;
        $this->utilized_at = Carbon::now();
        $this->save();

        event(new UserInvitationUtilized($this));

        return $user;
    }

    public function getTheCreatedUser(): ?UserContract
    {
        return $this->user;
    }

    public function isStillValid(): bool
    {
        return $this->isNotExpired() && $this->hasNotBeenUtilizedYet();
    }

    public function isNoLongerValid(): bool
    {
        return !$this->isStillValid();
    }

    public function hasNotBeenUtilizedYet(): bool
    {
        return null === $this->user_id;
    }

    public function hasBeenUtilizedAlready(): bool
    {
        return !$this->hasNotBeenUtilizedYet();
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isNotExpired(): bool
    {
        return !$this->isExpired();
    }

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id');
    }

    public function scopePending(Builder $query)
    {
        return $query
            ->whereNull('user_id')
            ->where('expires_at', '>', Carbon::now()->toDateTimeString());
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (null === $model->hash) {
                $model->hash = static::generateInvitationCode();
            }

            if (!isset($model->attributes['expires_at'])) {
                $model->expires_at = Carbon::now()->addDays(config('market_palace.user.invitation.default_expiry_days', 30));
            }

            if (!isset($model->attributes['type'])) {
                $model->type = UserTypeProxy::defaultValue();
            }
        });
    }
}

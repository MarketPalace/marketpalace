<?php

namespace App\Containers\MarketPalace\User\Models;

use App\Containers\AppSection\Authentication\Notifications\VerifyEmail;
use App\Containers\AppSection\Authentication\Traits\AuthenticationTrait;
use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Containers\MarketPalace\User\Contracts\Profile as ProfileContract;
use App\Containers\MarketPalace\User\Contracts\User as UserContract;
use App\Containers\MarketPalace\User\Events\UserWasActivated;
use App\Containers\MarketPalace\User\Events\UserWasCreated;
use App\Containers\MarketPalace\User\Events\UserWasDeleted;
use App\Containers\MarketPalace\User\Events\UserWasInactivated;
use App\Ship\Contracts\MustVerifyEmail;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use App\Ship\Utils\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property int $login_count
 * @property string $type
 * @property bool $is_active
 * @property Carbon|null $last_login_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class User extends ParentUserModel implements MustVerifyEmail, UserContract
{
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;
    use SoftDeletes;
    use CastsEnums;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birth',
        'type',
        'is_active'
    ];

    protected $dates = ['created_at', 'updated_at', 'last_login_at'];

    protected array $enums = [
        'type' => 'UserTypeProxy@enumClass'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date',
    ];

    protected array $events = [
        'created' => UserWasCreated::class,
        'deleted' => UserWasDeleted::class
    ];

    protected string $resourceKey = 'User';

    public function profile()
    {
        return $this->hasOne(ProfileProxy::modelClass(), 'user_id', 'id');
    }

    public static function getPasswordValidationRules(): Password
    {
        return Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();
    }

    public function sendEmailVerificationNotificationWithVerificationUrl(string $verificationUrl): void
    {
        $this->notify(new VerifyEmail($verificationUrl));
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function inactivate()
    {
        $this->is_active = false;
        $this->save();

        event(new UserWasInactivated($this));
    }

    public function activate()
    {
        $this->is_active = true;
        $this->save();

        event(new UserWasActivated($this));
    }

    public function getProfile(): ?ProfileContract
    {
        return $this->profile;
    }

    protected function email(): Attribute
    {
        return new Attribute(
            get: fn(string $value): string => strtolower($value),
        );
    }
}

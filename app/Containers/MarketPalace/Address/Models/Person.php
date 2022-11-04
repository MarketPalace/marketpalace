<?php
/**
 * Contains the Person model class.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Models;

use App\Containers\MarketPalace\Address\Enums\Gender;
use App\Containers\MarketPalace\Address\Enums\NameOrder;
use DateTime;
use App\Containers\MarketPalace\Address\Contracts\Person as PersonContract;
use Illuminate\Database\Eloquent\Model;
use App\Ship\Utils\CastsEnums;

/**
 * Person Entity class
 *
 * @property int            $id
 * @property string         $firstname  First Name
 * @property string         $lastname   Last Name
 * @property string         $email
 * @property DateTime       $birthdate
 * @property Gender         $gender
 * @property string         $phone      Max 22 chars
 * @property string         $nin        National Identification Number max 21 chars
 * @property NameOrder      $nameorder  Name order (eastern or western)
 */
class Person extends Model implements PersonContract
{
    use CastsEnums;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persons';

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'birthdate', 'nin', 'gender', 'nameorder'];

    /**
     * The attributes to be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'birthdate'
    ];

    protected $enums = [
        'gender'    => 'GenderProxy@enumClass',
        'nameorder' => 'NameOrderProxy@enumClass'
    ];

    /**
     * @inheritdoc
     */
    public function getFullName(): string
    {
        if ($this->nameorder && $this->nameorder->isEastern()) {
            return sprintf('%s %s', $this->lastname, $this->firstname);
        }

        return sprintf('%s %s', $this->firstname, $this->lastname);
    }
}

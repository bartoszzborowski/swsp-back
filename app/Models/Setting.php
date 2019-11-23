<?php

namespace App\Models;

use App\Constants\Database;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $system_name
 * @property string|null $system_title
 * @property string|null $system_email
 * @property int|null $selected_branch
 * @property string|null $selected_session
 * @property string|null $phone
 * @property string|null $purchase_code
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting wherePurchaseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSelectedBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSelectedSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSystemEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSystemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSystemTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    protected $table = Database::SETTINGS;
}

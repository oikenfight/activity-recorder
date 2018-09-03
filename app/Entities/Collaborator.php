<?php
declare(strict_types=1);

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Collaborator
 *
 * @package App\Entities
 * @property int $id
 * @property string $name
 * @property string $name_read
 * @property string $kana_name_read
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|Video $postVideos
 * @property-read \Illuminate\Database\Eloquent\Relations\HasMany|Video $actVideos
 */
class Collaborator extends Model
{
    /**
     * @var string tableName
     */
    protected $table = 'collaborators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_read',
        'kana_name_read',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'name_read' => 'string',
        'kana_name_read' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postVideos()
    {
        return $this->hasMany(Video::class, 'post_collaborator_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actVideos()
    {
        return $this->hasMany(Video::class, 'act_collaborator_id');
    }
}

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 *
 * @package App\Entities
 * @property int $id
 * @property string $name
 * @property int $action_id
 * @property int $post_collaborator_id
 * @property int $act_collaborator_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Collaborator $postCollaborator
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Collaborator $actCollaborator
 * @property-read \Illuminate\Database\Eloquent\Relations\BelongsTo|Action $action
 */
class Video extends Model
{
    /**
     * @var string tableName
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'action_id',
        'post_collaborator_id',
        'act_collaborator_id',
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
        'action_id' => 'integer',
        'post_collaborator_id' => 'integer',
        'act_collaborator_id' => 'integer',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postCollaborator()
    {
        return $this->belongsTo(Collaborator::class, 'post_collaborator_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function actCollaborator()
    {
        return $this->belongsTo(Collaborator::class, 'act_collaborator_id');
    }
}

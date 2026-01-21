<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'type', 'label', 'options', 'status', 'notes'];

    /**
     * Cast options to array when accessing
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Check if a feature is enabled
     */
    public function isEnabled(): bool
    {
        return $this->status === 'enabled';
    }

    /**
     * Check if a feature is in development
     */
    public function inDevelopment(): bool
    {
        return $this->status === 'development';
    }

    /**
     * Check if a feature is disabled
     */
    public function isDisabled(): bool
    {
        return $this->status === 'disabled';
    }

    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getValue(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value
     *
     * @param string $key
     * @param mixed $value
     * @param string $group
     * @return \App\Models\Setting
     */
    public static function setValue(string $key, $value, $group = 'general')
    {
        $setting = static::firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->group = $group;
        $setting->save();

        return $setting;
    }
}

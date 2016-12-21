<?php

namespace projectflyer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use projectflyer\Flyer;
use  Intervention\Image\ImageManagerStatic as Image;


class Photo extends Model
{


    protected $table = 'flyers_photos';

    protected $fillable = ['photo_path', 'thumbnail_path', 'name'];

    protected $file;


    public function flyer()
    {
        return $this->belongsTo('projectflyer\Flyer');
    }

    public static function FromFIle(UploadedFile $file)
    {
        $photo = new static;
        $photo->file = $file;
        $photo->name = $photo->photoPath();
        $photo->thumbnail_path = $photo->thumbnailPath();
        $photo->photo_path = $photo->photoPath();
        return $photo;

    }


    public function fileName(){
                return time() . $this->file->getClientOriginalName();

    }

    public function photoPath(){
                return $this->baseDir() . '/' . $this->fileName();
    }

    public function thumbnailPath(){
        return $this->baseDir() . '/tn-' . $this->fileName();

    }

            public function baseDir()
            {
                return 'flyer/photos';
            }


            public function saveToDir()

            {
                $this->file->move($this->baseDir(), $this->fileName());
                $this->moveThumbnail();
                return $this;
            }

            public function moveThumbnail()
            {
                Image::make($this->photoPath())
                    ->fit(180)
                    ->save($this->thumbnailPath());

            }

        }



<?php

use App\Event;
use App\Image;
use App\Keywords;
use App\License;
use App\Offer;
use App\Place;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $keyword = Keywords::forceCreate([
            'id' => 'visittampere:music',
            'data_source_id' => 'visittampere',
            'name' => 'music',
            'name_tr->fi' => 'Musiikki',
            'name_tr->en' => 'Music'
        ]);

        $license = License::forceCreate([
            'name' => 'cc-4.0',
            'name_tr->fi' => 'cc-4.0',
            'name_tr->en' => 'free to use',
            'url' => 'creativecommons'
        ]);

        $image = Image::forceCreate([
            'url' => 'http://visittampere.fi/media/3801af30-cd5b-11e4-b562-49633546a53f.png',
            'name' => 'sounds.png',
            'license_id' => $license->id
        ]);

        $place = Place::forceCreate([
            'id' => 'visittampere:4218',
            'name' => 'Satakunnankatu 13',
            'info_url' => 'http://www.nuortentampere.fi',
            'street_address' => 'Satakunnankatu 13',
            'address_region' => 'Tampere'
        ]);

        $event = Event::forceCreate([
            'id' => 'visittampere:4047',
            'name' => 'Sounds 2015 - young people\'s musical experiment',
            'name_tr->fi' => 'Sounds 2015 - sama suomeksi',
            'name_tr->en' => 'Sounds 2015 - young people\'s musical experiment',
            'description' => 'Classical and folk music plaeyd by young people in Monitoimitalo 13.',
            'description_tr->fi' => 'Monitoimitalo 13.',
            'description_tr->en' => 'Classical and folk music plaeyd by young people in Monitoimitalo 13.',
            'image_id' => $image->id,
            'location_id' => $place->id
        ]);

        $event->keywords()->save($keyword);
    }
}

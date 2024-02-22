<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Initial seed.
 */
class InitialSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Admin',
                'created' => '2024-02-12 14:00:06',
                'modified' => '2024-02-12 14:00:06',
            ],
            [
                'id' => 2,
                'name' => 'User',
                'created' => '2024-02-12 14:00:22',
                'modified' => '2024-02-12 14:00:22',
            ],
        ];

        $table = $this->table('roles');
        $table->insert($data)->save();


        $data = [
            [
                'id' => 1,
                'uuid' => '3e65059e-921a-4e4f-ab20-232b884c9b62',
                'username' => 'admin',
                'password' => '$2y$10$EyAJ.nxx2SPy3KVB3tc2kOGhc0RQLNM7Ox26Q1HPRccKs6.0UfMHG',
                'email' => 'admin@admin.com',
                'first_name' => 'John',
                'last_name' => 'Wick',
                'role_id' => 1,
                'active' => 1,
                'is_admin' => 1,
                'created' => '2024-02-12 14:04:37',
                'modified' => '2024-02-20 05:38:08',
            ],
            [
                'id' => 2,
                'uuid' => '95fe23c2-7db5-430a-9122-4899c5eeb641',
                'username' => 'user',
                'password' => '$2y$10$FGec85WxRdjd1HR1W3i6EurCsXSAg59Ii2/1JZIZ4MwvA1mwDRy8S',
                'email' => 'user@gmail.com',
                'first_name' => 'Ben',
                'last_name' => 'Armstrong',
                'role_id' => 2,
                'active' => 1,
                'is_admin' => 0,
                'created' => '2024-02-12 14:05:17',
                'modified' => '2024-02-19 18:35:25',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();


        $data = [
            [
                'id' => 1,
                'title' => 'Home',
                'slug' => 'Home',
                'content' => '<div>
<h2>What is Lorem Ipsum?</h2>
<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>
<div>
<h2>Where does it come from?</h2>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
</div>',
                'created' => '2024-02-16 15:21:36',
                'modified' => '2024-02-20 05:57:14',
                'created_by' => 2,
                'modfied_by' => 1,
                'is_draft' => 0,
            ],
            [
                'id' => 2,
                'title' => 'Contact Us',
                'slug' => 'Contact-Us',
                'content' => '<div id="lipsum">
<p>
Quisque metus elit, fermentum vitae ante at, pulvinar luctus dolor. Nullam a dolor rhoncus, pulvinar augue sit amet, rhoncus est. Etiam sed eros in enim lacinia finibus eget nec turpis. Integer dui orci, sollicitudin eu facilisis a, euismod et ante. Quisque viverra euismod ante, eget rhoncus ligula dictum malesuada. Maecenas quam libero, lacinia ut sem quis, tempor commodo lorem. Nullam luctus imperdiet lorem, id interdum velit consectetur non. Vivamus consequat aliquam nunc vel fermentum.
</p>
<p>
Donec elementum blandit mauris ut maximus. Vestibulum congue, dolor eu lacinia bibendum, quam erat tincidunt magna, quis efficitur justo risus eget quam. Suspendisse ac ex a velit faucibus vehicula non eu metus. Donec ut massa venenatis, lobortis magna placerat, aliquet purus. Maecenas hendrerit mattis odio sed accumsan. Mauris lorem dolor, sollicitudin at lacus vestibulum, accumsan sollicitudin augue. Proin in sem ac justo venenatis gravida non eleifend ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean euismod euismod libero ac dapibus. Donec molestie nisi ut sem pretium facilisis. Proin orci mauris, hendrerit et dapibus sed, tincidunt non diam. Duis sit amet maximus nisl.
</p>
<p>
Fusce mattis, magna id volutpat porttitor, justo mi gravida mi, in pulvinar nibh justo vitae dolor. Nulla at erat eget nisi dictum fringilla. Phasellus velit est, condimentum at iaculis eget, laoreet eu orci. Praesent posuere neque augue, nec varius leo laoreet ornare. Sed vestibulum, eros ac posuere imperdiet, libero augue lobortis urna, id volutpat ipsum sem sit amet odio. Vestibulum tempor vehicula urna, a consequat nibh aliquam nec. Aenean varius gravida consectetur. Phasellus at odio sed sapien lobortis pulvinar eu non nisi. Fusce enim nulla, faucibus quis ligula vitae, eleifend sagittis neque. Morbi mattis nisi sed turpis luctus, ut posuere ante facilisis. Quisque ut euismod leo.
</p></div>',
                'created' => '2024-02-16 16:11:38',
                'modified' => '2024-02-20 05:54:32',
                'created_by' => 2,
                'modfied_by' => 1,
                'is_draft' => 0,
            ],
            [
                'id' => 3,
                'title' => 'News',
                'slug' => 'News',
                'content' => '<div id="lipsum">
<p>
Fusce ante arcu, pellentesque quis dictum sed, efficitur a ante. Vestibulum sed tellus sit amet ipsum egestas gravida vel quis lorem. Curabitur venenatis at tellus vitae feugiat. Ut fermentum odio quis sodales fermentum. Maecenas a felis porta ante suscipit facilisis. Sed lorem odio, elementum eu lacus non, ornare tristique tortor. Morbi fringilla nulla a ornare ornare. Proin lacinia lobortis turpis, consectetur lacinia nisi porttitor et. Nunc dapibus eros nec odio convallis, eget varius sem scelerisque. Vestibulum rhoncus mauris ac gravida dignissim. Phasellus auctor hendrerit lorem, ac sagittis dui. Fusce consectetur risus eu enim dictum, vitae feugiat libero fringilla. Etiam non lacus eu leo dignissim accumsan.
</p></div>',
                'created' => '2024-02-19 11:48:47',
                'modified' => '2024-02-20 05:55:11',
                'created_by' => 2,
                'modfied_by' => 1,
                'is_draft' => 0,
            ],
            [
                'id' => 4,
                'title' => 'About',
                'slug' => 'About',
                'content' => '<div id="lipsum">
<p>
Quisque elementum eros et velit cursus, at aliquam mi blandit. Integer vel lectus sed nisi suscipit dapibus eu non est. Nunc orci mauris, pellentesque eget tortor mollis, lobortis tincidunt turpis. Praesent vitae suscipit odio, ut scelerisque nulla. Vestibulum quis augue eget sem congue hendrerit. Aenean molestie in leo quis mollis. Donec bibendum maximus risus, malesuada vehicula elit vulputate sodales. Curabitur vestibulum, ligula ut gravida lobortis, quam orci dapibus augue, quis vestibulum dui nibh vitae sapien. Aliquam feugiat congue dolor et tincidunt. Donec consequat tempus diam et sollicitudin.
</p>
<p>
Donec aliquet at erat eget lobortis. Morbi non ipsum a felis molestie rutrum. Nullam imperdiet sollicitudin augue ut tempor. Quisque eleifend purus sit amet ipsum mollis molestie. Suspendisse potenti. Nunc est dolor, ultricies in orci vel, volutpat rhoncus dui. Sed vel est dolor.
</p>
<p>
Nullam mattis sit amet velit in egestas. Donec erat ligula, scelerisque in molestie nec, dignissim pharetra lorem. Sed tempor non diam sit amet sollicitudin. Aenean magna purus, elementum id fringilla nec, consectetur a mi. Nulla auctor consequat leo, id facilisis lacus dignissim in. Proin tincidunt pharetra dolor in luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed augue sem, facilisis ac consectetur nec, maximus in ex. Ut euismod erat sed purus porta, vel sodales orci laoreet. Suspendisse venenatis ornare ex, sed vehicula mi euismod sed. Mauris mollis elit purus, vel tincidunt felis pellentesque sit amet. Suspendisse consectetur suscipit elit, eget luctus ante vehicula vel. In dui ligula, imperdiet at ex nec, porta condimentum nulla. Etiam ornare tincidunt enim a scelerisque. Vestibulum vitae lorem ullamcorper, fringilla metus et, convallis urna. Donec sed nulla et nibh luctus posuere.
</p>
<p>
In egestas, erat eu tempor dictum, odio lorem cursus augue, eu porta odio mauris a erat. Morbi aliquam blandit varius. Sed hendrerit ipsum augue, vel tempor odio euismod quis. Donec molestie nibh quis leo aliquet faucibus. Suspendisse fermentum elit ac erat dictum, sit amet hendrerit nibh iaculis. Integer nec ante in orci luctus tempor et ac augue. Nam eget neque et neque aliquet sodales in quis arcu. Aliquam quis dapibus leo. Vestibulum vulputate lorem ligula, at fermentum ex blandit nec. In placerat metus at mi luctus pretium. Donec eu orci quis nunc convallis dictum ut eu turpis. Etiam vestibulum, quam vitae cursus varius, arcu mauris convallis orci, sit amet lacinia leo enim ut magna. Vivamus sodales, augue a aliquam tempor, risus elit tristique tortor, dignissim volutpat tellus risus fermentum est. Nunc molestie orci suscipit congue venenatis. Vestibulum nisl arcu, feugiat eget ipsum vitae, imperdiet elementum dolor. Praesent aliquet accumsan diam vel dapibus.
</p>
<p>
In ornare sem quis scelerisque bibendum. Cras sollicitudin dui aliquet massa mattis sodales. Morbi tellus ante, dignissim bibendum elementum eget, placerat nec lectus. Donec sed dui lacus. Cras eu justo diam. Morbi mi nulla, egestas quis varius at, vehicula vel purus. Proin blandit vulputate nulla non tincidunt. Vivamus placerat orci sed ligula egestas sodales. Donec at consequat leo. Sed laoreet ut metus non molestie.
</p></div>',
                'created' => '2024-02-19 11:49:04',
                'modified' => '2024-02-20 05:54:00',
                'created_by' => 2,
                'modfied_by' => 1,
                'is_draft' => 0,
            ],
        ];

        $table = $this->table('pages');
        $table->insert($data)->save();

    }
}

<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{
    public function up()
    {

        $this->execute("
                insert into testimonials(title, testimonial, user_id)
                values 
                ('My thougths', 'This is a couple of my thoughts of this project', '1')
            ");
    }
    public function down()
    {
        
    }

}

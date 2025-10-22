<?php

/**Admin **/
require base_path('routes/admin/complex-configuration.php');
require base_path('routes/admin/apartments.php');
require base_path('routes/admin/buildings.php');
require base_path('routes/admin/transitions.php');

/** Web **/
require base_path('routes/web/home.php');
require base_path('routes/web/complex.php');
require base_path('routes/web/apartments.php');

/** API **/

require base_path('routes/api.php');

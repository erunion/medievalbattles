	<?php

							$hourdiff = "0"; 

							$timeadjust = ($hourdiff * 60 * 60);

							$clock = date(" d F h:i:s a",time() + $timeadjust);

							print ("$clock");
						?>
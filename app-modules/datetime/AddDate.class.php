<?php 
	
	class AddDate{

		public static $diff;

		public static function send($date)
		{
			$currentDate = date("Y-m-d H:i:s");

			$date_time_one = new DateTime($currentDate);
			
			$date_time_two = new DateTime($date);

			self::$diff = $date_time_one->diff($date_time_two, true);

			return self::show();
		}

		public static function year()
		{
			$Y = self::$diff->y;
			if($Y > 0)
			{

				return $Y;
			}
			else
			{
				return 0;
			}
		}

		public static function month()
		{
			$M = self::$diff->m;

			if($M > 0)
			{

				return $M;
			}
			else
			{
				return 0;
			}
		}

		public static function day()
		{
			$D = self::$diff->d;
			if($D > 0)
			{
				return $D ;
			}
			else
			{
				return 0;
			}
		}
		public static function hour()
		{
			$H = self::$diff->h;

			if($H > 0)
			{

				return $H ;
				
			}
			else
			{
				return 0;
			}
		}

		public static function minite()
		{
			$i = self::$diff->i;

			if($i > 0)
			{

				return $i;
			}
			else
			{
				return 0;
			}
		}

		public static function sec()
		{
			$s = self::$diff->s;

			if($s > 0)
			{

				return $s;
			}
			else
			{
				return 0;
			}
		}


		public static function 	show()
		{
			$y = self::year();
			$m = self::month();
			$d = self::day();
			$h = self::hour();
			$mi= self::minite();
			$s = self::sec();

			$final = "";

			if($y > 0)
			{
				$final = $y. ' an(s)';
			}

			if($m > 0 && $y < 1)
			{
				$final = $m . ' mois';
			}


			if($d > 0 && $m < 1 && $y < 1) 
			{
				$final = $d . ' jour(s)';
			}


			if($h > 0 && $d == 0 && $m==0 && $y==0) 
			{
				$final = $h. ' heure(s)';
			}

			if($mi > 0 && $h == 0 && $d == 0 && $y ==0) 
			{
				$final = $mi . ' minute(s)';
			}

			if($s > 0 && $mi == 0 && $d==0 && $h==0)
			{
				$final = $s . ' secondes';
			}


			return $final;
		
		}

	}

 ?>


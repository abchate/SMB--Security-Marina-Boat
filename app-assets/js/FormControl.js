class Form 
{
	constructor()
	{

	}

	textField(input)
	{
		if(input.length > 2) 
		{
			let pattern = new RegExp('^[^0-9][a-zA-Z éçàïöëäôîêâè]+$');

			if(pattern.test(input))
			{
				return 0;
			}
			else
			{
				return 1;
			}
		} 
		else
		{
			return 1;
		}
	}

	emailField(input)
	{
		if(input.length > 4) 
		{
			let pattern = new RegExp("^[^0-9][a-zA-Z0-9\-]+@(.*)\.[a-z]+$");

			if(pattern.test(input))
			{
				return 0;
			}
			else
			{
				return 1;
			}
		} 
		else
		{
			return 1;
		}
	}

	phoneField(input)
	{
		if(input.length == 7) 
		{
			let pattern = new RegExp("^(3|4)+[(0-9)]{6}$");

			if(pattern.test(input))
			{
				return 0;
			}
			else
			{
				return 1;
			}
		} 
		else
		{
			return 1;
		}
	}


}
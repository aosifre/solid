<?php

class User {
	
}

/**
*** Single Responsibility Principle in PHP (not working)
**/

class UserService 
{
	public function updateFromAPI(User $user): User
	{
		// ...	
	}

	public function removeSession( User $user ): void
	{
		// ...	
	}

	public function isUserAllowedToAccessAdmin( User $user ): bool
	{
		// ...
	}

	public function serialize( User $user ): string
	{
		// ...
	}
}
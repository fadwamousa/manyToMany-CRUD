<?php
use App\User;
use App\Role;


///insert the role for some one user
Route::get('/insert', function () {

	$user = User::find(1);

	$role = New Role();
	$role->name = "admin";
	$user->roles()->save($role);
    
});


//read the role for some one user
Route::get('/read', function () {

	$user = User::find(1);

	foreach ($user->roles as $role) {
		
		echo $role->name;
	}
    
});


//update the role for some one user
Route::get('/update', function () {

	$user = User::find(1);
    
   // $user->roles()->where('id','=',1)->update(['name'=>'fadwa']);

    if($user->has('roles')){

        //mean if have relationship called roles

        foreach ($user->roles as $role) {

        	if($role->name == "admin"){
        		$role->name = "fadwa";
        	    $role->save();
        	}
        	
        }


    }
	
    
});

/*Route::get('/delete',function(){ 
	$user = User::find(1); 
	$user->roles->where('id',4)->delete();
});*/
Route::get('/delete',function(){ 
	$user = User::find(1); 
	foreach ($user->roles as $role) {
		
		$role->where('id',4)->delete();
	}
});


Route::get('/attach',function(){

	$user = User::findOrFail(1);

	/*
	$user->roles()->attach(1);
	that mean take user number one to role number 2
	*/
    /*
    $user->roles()->detach(2);
    that mean remove role number 2 for user number 1
    */

    $user->roles()->sync([3,4]);
	

});
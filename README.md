CAM
===

The Codeigniter Awesome Model

## What is this?

CAM is a Codeigniter model to replace them all. I wrote it because I was spending to much time writing models for CRUD and did not want to use and ORM for some projects. It works on top of Active Record and simplify the most common database tasks. Not neccesary the most beautiful sintax, but it works.


## Installation:

* Install and configure your Codeigniter installation as usual.
* Drop cam.php into your `application/models` folder.
* Include CAM in your controllers as any other Codeigniter model.

## Documentation:

Look inside `cam.php` for more information.

## Example usage:

Once you load it into your controllers, simple use it as any other model:

	- To create a record in a table called 'people': `$this->Cam->create('people',array('name'=>'Peter','last'=>'Parker'));` This Will return the id of the inserted record.
	- To select all records in a table: `$data = $this->Cam->get('people')`. This will return an array.
	- To select some records using the 'where' clausule: `$data = $this->Cam->get_where('people',array('last'=>'parker'))`;



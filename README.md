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

* To create a record in a table called 'people': `$this->Cam->create('people',array('name'=>'Peter','last'=>'Parker'));` This will return the id of the inserted record.
* To select all records in a table: `$data = $this->Cam->get('people')`. This will return an array.
* To select some records using the 'where' clausule: `$data = $this->Cam->get_where('people',array('last'=>'parker'))`;
* To update a record: `$this->Api->update('people',array('name'=>'newdata'),$id);` `$id` is the id of the record you want to update.
* To update a record using the 'where' clausule: `$this->Api->update_where('people',array('name'=>'newdata'),array('last'=>'Parker'));`
* To delete a record you should read the inline documentation. Trust me.

## Considerations:

* In order for CAM to work as expected, you must have a field called `id` in your tables. If don't want, modify the source.
* Is better if you create a field called `active` in your tables. It is for deleting pourposes. Refer to the inline documentation for details.

## License:

MIT licence. Do whatever you want.



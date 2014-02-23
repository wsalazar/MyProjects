<?php
namespace DoctrineLib;

use Iterator, SplFileObject, Countable;

class ISDACSVReadFile implements Iterator, Countable
{
	private $isda;

	private $file;

	public function __construct($isda){
		$this->isda = $isda;
		$this->file = new SplFileObject($this->isda);
		$this->file->setFlags(SplFileObject::READ_CSV);
	}

	public function current(){
		return $this->file->current();
	}

	public function eof(){}

	public function next(){
		return $this->file->next();
	}

	public function count(){}

	public function key(){}

	public function valid(){
		return $this->file->valid();
	}

	public function rewind(){
		return $this->file->rewind();
	}
}

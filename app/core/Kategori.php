<?php 

class Kategori
{
	public static function setJudul($judul)
	{
		switch ($judul) {
			case 'Bumbudapur':
				return 'Bumbu dapur';
				break;
			case 'Makananbayi':
				return 'Makanan bayi';
				break;
			case 'Menudiet':
				return 'Menu diet';
				break;
			case 'Makananpokok':
				return 'Makanan pokok';
				break;
			default:
				return $judul;
				break;
		}
	}
}
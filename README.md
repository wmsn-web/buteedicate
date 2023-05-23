![status: archive](https://github.com/GIScience/badges/raw/master/status/archive.svg)
![License: MIT](https://camo.githubusercontent.com/ad8758fbaebbced78645b98e446c0bb5ec223676ed61700184320887cadbfb8e/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f6c6963656e73652d4d49542d627269676874677265656e2e7376673f7374796c653d666c61742d737175617265)

# Byteducate Project in Codeigniter
	

## Manage Config file
- Open *config folder* Under application folder.
- Open *config.php*

``` php
    $config['base_url'] = 'http://localhost/YOUR_PROJECT_DIRECTORY';
```

## Add Database
- Need to add *database name*, *Username* and *Password*.
- Open *database.php* Under config folder.
### For localhost
-  *hostname=>'localhost'*
- *username=>'root'*
- *password=>''*  No need to add password

```php
	$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'USERNAME',
	'password' => 'PASSWORD',
	'database' => 'DATABASE_NAME',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
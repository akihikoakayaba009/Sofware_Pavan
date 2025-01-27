<?php

use Illuminate\Support\Str;

return [

    /*
    |----------------------------------------------------------------------
    | Default Database Connection Name
    |----------------------------------------------------------------------
    |
    | Aqui você pode especificar qual das conexões de banco de dados abaixo 
    | deseja usar como a conexão padrão para operações de banco de dados.
    | Esta será a conexão utilizada, a menos que outra conexão seja 
    | explicitamente especificada ao executar uma consulta / instrução.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),  // Usar MySQL como padrão

    /*
    |----------------------------------------------------------------------
    | Conexões de Banco de Dados
    |----------------------------------------------------------------------
    |
    | Aqui estão todas as conexões de banco de dados definidas para sua aplicação.
    | Um exemplo de configuração é fornecido para cada sistema de banco de dados
    | que é suportado pelo Laravel. Você pode adicionar ou remover conexões.
    |
    */

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'), // Usando localhost (127.0.0.1)
            'port' => env('DB_PORT', '3306'), // Porta padrão do MySQL
            'database' => env('DB_DATABASE', 'ecommerce'), // Nome do banco de dados
            'username' => env('DB_USERNAME', 'root'), // Usuário padrão para MySQL no localhost
            'password' => env('DB_PASSWORD', ''), // Senha vazia, se não houver senha configurada
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

    ],

    /*
    |----------------------------------------------------------------------
    | Tabela de Repositório de Migrações
    |----------------------------------------------------------------------
    |
    | Esta tabela mantém o controle de todas as migrações que já foram executadas
    | em sua aplicação. Usando essas informações, podemos determinar quais migrações
    | no disco não foram realmente executadas no banco de dados.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |----------------------------------------------------------------------
    | Banco de Dados Redis
    |----------------------------------------------------------------------
    |
    | O Redis é um banco de dados chave-valor de código aberto, rápido e avançado
    | que também fornece um conjunto mais rico de comandos do que um sistema
    | chave-valor típico, como o Memcached. Você pode definir suas configurações
    | de conexão aqui.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];

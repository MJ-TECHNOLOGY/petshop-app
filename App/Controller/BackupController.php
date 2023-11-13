<?php

namespace App\Controller;

use App\Controller\Controller;

class BackupController extends Controller 
{
    public static function Backup()
    {
        $command = '"C:/Program Files/MySQL/MySQL Server 8.0/bin/mysqldump" -uroot -petecjau -P3307 -hlocalhost db_petshop > D:/backup/file.sql';
        exec($command, $output, $exit_code);

        if ($exit_code === 0) {
            /*echo "<script>alert('Backup realizado com sucesso.');</script>";*/
            $message = 'Backup realizado com sucesso.';
        } else {
            $message = 'Erro ao realizar o backup.';
        }

        header('Location: /home?message=' . urlencode($message));   
    }

    public static function restoreBackup()
    {
        $command = '"C:/Program Files/MySQL/MySQL Server 8.0/bin/mysql" -uroot -petecjau -P3307 -hlocalhost db_petshop < D:/backup/file.sql';
        exec($command, $output, $exit_code);

        if ($exit_code === 0) {
            $message = 'Restore realizado com sucesso.';
        } else {
            $message = 'Erro ao realizar o restore.';
        }

        header('Location: /home?message=' . urlencode($message));
    }
}
<?php

namespace App\Controller;

use App\Controller\Controller;

class BackupController extends Controller 
{
    public static function backup()
    {
        $host = 'localhost:3307';
        $usuario = 'root';
        $senha = 'etecjau';
        $banco = 'db_petshop';
        $caminhoBackup = 'E:/Backup';

        $resultadoBackup = self::realizarBackup($host, $usuario, $senha, $banco, $caminhoBackup);

        if ($resultadoBackup !== false) {
            $message = "Backup realizado com sucesso. Caminho do arquivo: {$resultadoBackup}";
        } else {
            $message = 'Erro ao realizar o backup.';
        }

        header('Location: /home?message=' . urlencode($message));
    }

    public static function restoreBackup()
    {
        $host = 'localhost:3307';
        $usuario = 'root';
        $senha = 'etecjau';
        $banco = 'db_petshop';
        $caminhoBackup = 'D:/backup';
        $nomeArquivoBackup = 'file.sql';

        $resultadoRestore = self::restaurarBackup($host, $usuario, $senha, $banco, $caminhoBackup, $nomeArquivoBackup);

        if ($resultadoRestore !== false) {
            $message = 'Restore realizado com sucesso.';
        } else {
            $message = 'Erro ao realizar o restore.';
        }

        header('Location: /home?message=' . urlencode($message));
    }

    private static function realizarBackup($host, $usuario, $senha, $banco, $caminhoBackup)
    {
        try {
            // Gera o nome do arquivo de backup com base na data e hora
            $dataHoraAtual = date('Ymd_His');
            $nomeArquivo = "backup_{$banco}_{$dataHoraAtual}.sql";

            // Caminho completo para o arquivo de backup
            $caminhoCompleto = $caminhoBackup . '/' . $nomeArquivo;

            // Comando mysqldump
            $comando = "\"C:/Program Files/MySQL/MySQL Server 8.0/bin/mysqldump\" -h{$host} -u{$usuario} -p{$senha} {$banco} > {$caminhoCompleto}";

            // Executa o comando
            exec($comando, $output, $exitCode);

            // Verifica se o backup foi criado com sucesso
            if ($exitCode === 0) {
                return $caminhoCompleto;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Lida com qualquer exceção que ocorra durante o backup
            return false;
        }
    }

    private static function restaurarBackup($host, $usuario, $senha, $banco, $caminhoBackup, $nomeArquivoBackup)
    {
        try {
            // Caminho completo para o arquivo de backup
            $caminhoCompleto = $caminhoBackup . '/' . $nomeArquivoBackup;

            // Comando mysql para restaurar o backup
            $comando = "\"C:/Program Files/MySQL/MySQL Server 8.0/bin/mysql\" -h{$host} -u{$usuario} -p{$senha} {$banco} < {$caminhoCompleto}";

            // Executa o comando
            exec($comando, $output, $exitCode);

            // Verifica se o restore foi concluído com sucesso
            return $exitCode === 0;
        } catch (\Exception $e) {
            // Lida com qualquer exceção que ocorra durante o restore
            return false;
        }
    }
}
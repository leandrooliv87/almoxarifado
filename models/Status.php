<?php
    namespace app\models;

    use yii\helpers\ArrayHelper;

    class Status
    {
        const STATUS_ATIVO = 'ativo';
        const STATUS_INATIVO = 'inativo';

        const STATUS_PEDIDO_ABERTO = 'aberto';
        const STATUS_PEDIDO_PENDENTE = 'pendente';
        const STATUS_PEDIDO_ATENDIDO = 'atendido';
        const STATUS_PEDIDO_REPROVADO = 'reprovado';

        public static function getSituacao(): array
        {
            return [
                static::STATUS_ATIVO => 'ativo',
                static::STATUS_INATIVO => 'inativo',
            ];
        }

        public static function getStatusPedido(): array
        {
            return[
                static::STATUS_PEDIDO_ABERTO => 'aberto',
                static::STATUS_PEDIDO_ATENDIDO => 'atendido',
                static::STATUS_PEDIDO_PENDENTE => 'pendente',
                static::STATUS_PEDIDO_REPROVADO => 'reprovado',
            ];
        }

        public static function getEmpresa()
        {
            $empresas = Empresas::find()->orderBy('nome_empresa ASC')->all();
            return arrayhelper::map($empresas, 'id', 'nome_empresa');
        }

        public static function getFuncaoUsuario()
        {
            $funcaoUsuario = FuncaoUsuarios::find()->orderBy('funcao_usuario ASC')->all();
            return ArrayHelper::map($funcaoUsuario, 'id', 'funcao_usuario');
        }

        public static function getDepartamento()
        {
            $departamento = Departamentos::find()->orderBy('nome_departamento ASC')->all();
            return ArrayHelper::map($departamento, 'id', 'nome_departamento');
        }
    }
?>
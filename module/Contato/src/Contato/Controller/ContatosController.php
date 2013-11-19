<?php

/**
 * namespace de localizacao do nosso controller
 */

namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ContatosController extends AbstractActionController {

    // GET /contatos
    public function indexAction() {
        
    }

    // GET /contatos/novo
    public function novoAction() {
        
    }

    // POST /contatos/adicionar
    public function adicionarAction() {

        // obtém a requisição
        $request = $this->getRequest();

        // verifica se a requisição é do tipo post
        if ($request->isPost()):

            // obtém e armazena valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido):

                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Contato adcionado com sucesso");

                // redirecionar para action index no controller contatos
                return $this->redirect()->toRoute("contatos");

            else:

                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao adcionar o contato");

                return $this->redirect()->toRoute("contatos", array("action" => "novo"));

            endif;

        endif;
    }

    // GET /contatos/detalhes/id
    public function detalhesAction() {

        // filtra o id passado pela url
        $id = (int) $this->params()->FromRoute('id', 0);

        // verifica se o id = 0 ou não informardo redireciona para os conatos
        if (!$id):

            // adicionar uma mensagem
            $this->flashMessenger()->addMessage("Contato não encontrado");

            // redirecionar para o contatos
            return $this->redirect()->toRoute("contatos");

        endif;

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado
        // formulário com dados preenchidos
        $form = array(
            'nome' => 'Braz Leonardo',
            'telefone_principal' => '(085) 9900-9090',
            'telefone_secundario' => '(085) 9999-9999',
            'data_criacao' => '19/11/2013',
            'data_atualizacao' => '19/11/2013'
        );

        // dados enviados para detalhes.phtml
        return array('id' => $id, 'form' => $form);
    }

    // GET /contatos/editar/id
    public function editarAction() {

        // filtra o id passado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // verifico se o id = 0 ou não foi informado e recireciona para os contatos
        if (!$id):

            // adicionar uma mensagem
            $this->flashMessenger()->addMessage("Contato não encontrado");

            // redireciona para o contatos
            return $this->redirect()->toRoute("contatos");

        endif;

        // aqui vai a lógica para pegar os dados referente ao contato
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse contato encontrado
        // formulário com dados preenchidos
        $form = array(
            'nome' => 'Braz Leonardo',
            'telefone_principal' => '(085) 9900-9090',
            'telefone_secundario' => '(085) 9999-9999'
        );

        return array('id' => $id, 'form' => $form);
    }

    // PUT /contatos/editar/id
    public function atualizarAction() {

        // obtém a requisição
        $request = $this->getRequest();

        // verifico se a requisição é do tipo POST
        if ($request->isPost()):

            // obter valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido):

                // aqui vai a lógica para editar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela atualização
                // 2 - editar dados no banco pelo model
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addMessage("Contato editado com sucesso");

                // redireciona para action detalhes
                return $this->redirect()->toRoute("contatos", array("action" => "detalhes", "id" => $postData["id"]));

            else:

                // adicionar mensagem de erro
                $this->flashMessenger()->addMessage("Erro ao editar o contato");

                // redireciona para a action editar
                return $this->redirect()->toRoute("contatos", array("action" => "editar", "id" => $postData["id"]));

            endif;


        endif;
    }

    // DELETE /contatos/deletar/id
    public function deletarAction() {

        // filtra o id passado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // verifico se o id = 0 ou não informado e redireciona para contatos
        if (!$id):

            // adicionar uma mensagem de erro
            $this->flashMessenger()->addMessage("Contato não encontrado");

        else:

            // aqui vai a lógica para deletar o contato no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta contato
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("O contato de ID $id deletado com sucesso");

        endif;

        $this->redirect()->toRoute("contatos");
    }

}

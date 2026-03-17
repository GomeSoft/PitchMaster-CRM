# ⚽ Gestor de Ligas de Futebol (Mini-CRM)

Projeto final de módulo focado na criação de um mini-CRM para visualização e gestão de Ligas de Futebol e respetivas Equipas, desenvolvido em Laravel. 

## 📋 Descrição Geral

Esta aplicação permite gerir equipas de futebol organizadas pelas suas respetivas ligas (ex: Primeira Liga, Premier League, La Liga). Inclui uma área pública para consulta e um sistema de autenticação com diferentes níveis de acesso (Administrador e Utilizador) para gestão de dados e acesso a um Dashboard personalizado.

O sistema utiliza o **Laravel Fortify** para a gestão completa da autenticação (registo, login, etc.).

## 🚀 Funcionalidades Principais

* **Área Pública (Visitantes):**
  * Listagem das Ligas disponíveis (com nome, logótipo e contagem automática de equipas).
  * Visualização detalhada de cada Liga com a tabela das respetivas equipas (nome, emblema, data de fundação, estádio).
* **Área de Utilizadores Autenticados:**
  * Registo e Login (via Laravel Fortify).
  * Dashboard personalizado com saudação ao utilizador.
  * Possibilidade de edição do próprio perfil e adição de comentários/notas aos clubes (se implementado).
* **Área de Administração:**
  * Proteção por Middleware de papel/role (`admin`).
  * CRUD completo (Criar, Ler, Atualizar, Apagar) para **Ligas**.
  * CRUD completo para **Equipas**.

## 🛠️ Tecnologias Utilizadas

* **Framework:** Laravel 12 (PHP)
* **Autenticação:** Laravel Fortify
* **Frontend:** Blade Templates, HTML5, CSS3, TailwindCSS
* **Base de Dados:** MySQL

👨‍💻 Autor
Eugénio Gomes 
Linkedin - https://www.linkedin.com/in/eug%C3%A9nio-gomes-126010276/
Portfolio - https://eugenio-gomes.vercel.app/  


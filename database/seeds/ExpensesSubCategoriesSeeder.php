<?php

use Illuminate\Database\Seeder;

class ExpensesSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses_sub_categories')->insert([
            [
                'name' => 'Moradia',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Automóvel',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Saúde',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Educação',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Mercado',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Pet',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Outras Despesas',
                'user_id' => 1,
                'expense_category_id' => 1,
            ],

            ////////////////////////////////////
            [
                'name' => 'Alimentação',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Atividades Físicas',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Compras',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Cuidados Pessoais',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Presentes e Doações',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Mídia',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Tarifas Bancárias',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Impostos',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Saques Bancários',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Viagens',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Outras Despesas',
                'user_id' => 1,
                'expense_category_id' => 2,
            ],

            /////////////////////////////////
            [
                'name' => 'Ações',
                'user_id' => 1,
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Títulos Públicos',
                'user_id' => 1,
                'expense_category_id' => 3,
            ],
            [
                'name' => 'CDB',
                'user_id' => 1,
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Fundos de Investimento',
                'user_id' => 1,
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Fundos Imobiliários',
                'user_id' => 1,
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Outros Investimentos',
                'user_id' => 1,
                'expense_category_id' => 3,
            ],
        ]);
    }
}

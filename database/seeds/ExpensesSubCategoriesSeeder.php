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
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Automóvel',
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Saúde',
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Educação',
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Mercado',
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Pet',
                'expense_category_id' => 1,
            ],
            [
                'name' => 'Outras Despesas',
                'expense_category_id' => 1,
            ],

            ////////////////////////////////////
            [
                'name' => 'Alimentação',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Atividades Físicas',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Compras',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Cuidados Pessoais',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Presentes e Doações',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Mídia',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Tarifas Bancárias',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Impostos',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Saques Bancários',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Viagens',
                'expense_category_id' => 2,
            ],
            [
                'name' => 'Outras Despesas',
                'expense_category_id' => 2,
            ],

            /////////////////////////////////
            [
                'name' => 'Ações',
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Títulos Públicos',
                'expense_category_id' => 3,
            ],
            [
                'name' => 'CDB',
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Fundos de Investimento',
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Fundos Imobiliários',
                'expense_category_id' => 3,
            ],
            [
                'name' => 'Outros Investimentos',
                'expense_category_id' => 3,
            ],
        ]);
    }
}

<template>
  <v-app>


    <!-- верхняя панель -->
    <v-container fluid>
      <v-app-bar
          color="blue"
      >
        <v-app-bar-title>ЧитайДеревня</v-app-bar-title>

        <v-row>
          <v-col cols="12" offset="11">
            <v-btn class="justify-end">
              <v-icon>mdi-exit-to-app</v-icon>
              exit</v-btn>
          </v-col>
        </v-row>
      </v-app-bar>
    </v-container>

    <!-- панель навигации -->
    <v-container>
      <v-layout class="overflow-visible">

        <v-bottom-navigation v-model="value" color="primary" horizontal>

          <v-btn>
            <v-icon>mdi-basket</v-icon>
            Инвентаризация
          </v-btn>

          <v-btn>
            <v-icon>mdi-file-document-edit</v-icon>
            Список товаров
          </v-btn>

          <v-btn>
            <v-icon>mdi-account-group</v-icon>
            Поставщики
          </v-btn>
        </v-bottom-navigation>
      </v-layout>
    </v-container>


    <!-- кнопки-->
    <template>
      <div class="d-flex justify-space-around" style="padding-top: 25px; margin-top: 0px">
        <v-btn>
          <v-icon>mdi-shape-square-plus</v-icon>
          Add
          <v-tooltip activator="parent">Tooltip</v-tooltip>
        </v-btn>

        <v-btn>
          <v-icon>mdi-delete</v-icon>
          Delete
          <v-tooltip activator="parent">Tooltip</v-tooltip>
        </v-btn>

        <v-btn>
          <v-icon>mdi-file-document-edit</v-icon>
          Edit
          <v-tooltip activator="parent">Tooltip</v-tooltip>
        </v-btn>

        <v-btn>
          <v-icon>mdi-sort</v-icon>
          Sort
          <v-tooltip activator="parent">Tooltip</v-tooltip>
        </v-btn>

        <v-btn>
          <v-icon>mdi-table-search</v-icon>
          Search
          <v-tooltip activator="parent">Tooltip</v-tooltip>
        </v-btn>
      </div>
    </template>


    <!-- таблица-->
    <template >
      <div class="d-flex justify-space-around" >
        <v-row class="d-flex justify-center" style="padding: 10px; margin: 5px">
          <v-table style="padding: 10px; margin: 10px">
            <thead>
            <tr style="background-color: #1a237e; letter-spacing: 2px;" >
              <th class="text-left" style="color: white; padding: 10px;">Название</th>
              <th class="text-left" style="color: white; padding: 10px;">Автор</th>
              <th class="text-left" style="color: white; padding: 10px;">Артикул</th>
              <th class="text-left" style="color: white; padding: 10px;">Статус</th>
              <th class="text-left" style="color: white; padding: 10px;">Закупка (руб)</th>
              <th class="text-left" style="color: white; padding: 10px;">%</th>
              <th class="text-left" style="color: white; padding: 10px;">Цена (руб)</th>
              <th class="text-left" style="color: white; padding: 10px;">Доп. информация</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in books" :key="item.articul">
              <td class="text-left" style="padding: 10px;">{{ item.name }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.author }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.articul }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.status }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.purchase }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.percent }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.price }}</td>
              <td class="text-left" style="padding: 10px;">{{ item.information }}</td>
            </tr>
            </tbody>
          </v-table>

        </v-row>
      </div>>
    </template>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      books: [
        {
          name: 'Мартин Иден',
          author: 'Джек Лондон',
          articul: 12345,
          status: 'В наличии',
          purchase: 300,
          percent: 20,
          price: 360,
          information: 'Есть акция',
        },
        {
          name: 'Портрет Дориана Грея',
          author: 'Оскар Уайльд',
          articul: 12346,
          status: 'Нет в наличии',
          purchase: 400,
          percent: 20,
          price: 480,
          information: 'Нужен заказ',
        },
        {
          name: 'Грозовой перевал',
          author: 'Эмили Бронте',
          articul: 12347,
          status: 'В наличии',
          purchase: 200,
          percent: 20,
          price: 240,
          information: '',
        },
        {
          name: 'Щегол',
          author: 'Донна Тартт',
          articul: 12348,
          status: 'В наличии',
          purchase: 600,
          percent: 25,
          price: 750,
          information: 'Есть акция',
        },

        {
          name: 'Унесенные ветром',
          author: 'Маргарет Митчелл',
          articul: 12349,
          status: 'В наличии',
          purchase: 300,
          percent: 20,
          price: 360,
          information: '',
        },
        {
          name: 'Мартин Иден',
          author: 'Джек Лондон',
          articul: 12345,
          status: 'В наличии',
          purchase: 300,
          percent: 20,
          price: 360,
          information: 'Есть акция',
        },
        {
          name: 'Портрет Дориана Грея',
          author: 'Оскар Уайльд',
          articul: 12346,
          status: 'Нет в наличии',
          purchase: 400,
          percent: 20,
          price: 480,
          information: 'Нужен заказ',
        },
        {
          name: 'Грозовой перевал',
          author: 'Эмили Бронте',
          articul: 12347,
          status: 'В наличии',
          purchase: 200,
          percent: 20,
          price: 240,
          information: '',
        },
        {
          name: 'Щегол',
          author: 'Донна Тартт',
          articul: 12348,
          status: 'В наличии',
          purchase: 600,
          percent: 25,
          price: 750,
          information: 'Есть акция',
        },

        {
          name: 'Унесенные ветром',
          author: 'Маргарет Митчелл',
          articul: 12349,
          status: 'В наличии',
          purchase: 300,
          percent: 20,
          price: 360,
          information: '',
        },
        {
          name: 'Мартин Иден',
          author: 'Джек Лондон',
          articul: 12345,
          status: 'В наличии',
          purchase: 300,
          percent: 20,
          price: 360,
          information: 'Есть акция',
        },
        {
          name: 'Портрет Дориана Грея',
          author: 'Оскар Уайльд',
          articul: 12346,
          status: 'Нет в наличии',
          purchase: 400,
          percent: 20,
          price: 480,
          information: 'Нужен заказ',
        },
        {
          name: 'Грозовой перевал',
          author: 'Эмили Бронте',
          articul: 12347,
          status: 'В наличии',
          purchase: 200,
          percent: 20,
          price: 240,
          information: '',
        },
        {
          name: 'Щегол',
          author: 'Донна Тартт',
          articul: 12348,
          status: 'В наличии',
          purchase: 600,
          percent: 25,
          price: 750,
          information: 'Есть акция',
        },

        {
          name: 'Унесенные ветром',
          author: 'Маргарет Митчелл',
          articul: 12349,
          status: 'В наличии',
          purchase: 300,
          percent: 20,
          price: 360,
          information: '',
        },
      ],
    }
  },
}
</script>

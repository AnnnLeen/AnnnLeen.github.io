

<template>
  <v-app>


    <!-- верхняя панель -->
    <v-container fluid>
      <v-app-bar
          color="blue"
          dense
          dark
      >
        <v-app-bar-title>Магазин «ЧитайДеревня»</v-app-bar-title>
      </v-app-bar>
    </v-container>

    <!-- панель навигации -->
    <v-container >
      <v-layout class="overflow-visible" >

        <v-bottom-navigation v-model="value" color="primary" horizontal  style="padding-top: 10px; margin-top: 0px">

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

    <v-container class="mx-auto pa-12 pb-8">
    <template>
      <v-file-input label="Список товаров для заказа" show-size></v-file-input>
      <v-file-input label="Отчет о закупках" show-size></v-file-input>
    </template>
      </v-container >
  </v-app>
</template>


<script setup>
</script>

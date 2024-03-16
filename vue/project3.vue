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
    <v-container >
      <v-layout class="overflow-visible" >

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

    <template>
      <div style="padding-top: 0px; margin-top: 25px">
        <v-card
            class="mx-auto pa-14 pb-12"
            elevation="10"
            max-width="448"
            rounded="lg"
        >
      <v-file-input label="Список товаров для заказа" show-size></v-file-input>
      <v-file-input label="Отчет о закупках" show-size></v-file-input>
          <v-btn color="blue" block>
            Отправить
          </v-btn>
        </v-card>
      </div>
    </template>
  </v-app>
</template>


<script setup>
</script>

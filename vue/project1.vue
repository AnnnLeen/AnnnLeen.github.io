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
    <v-container>
      <v-layout class="overflow-visible">

        <v-bottom-navigation v-model="value" color="primary" horizontal style="padding-top: 10px; margin-top: 0px">

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

    <!-- вход в аккаунт -->
    <template>
      <div>
        <v-img class="mx-auto my-6" max-width="228"></v-img>

        <v-card
            class="mx-auto pa-12 pb-8"
            elevation="8"
            max-width="448"
            rounded="lg"
        >
          <div class="text-subtitle-1 text-medium-emphasis">Вход</div>

          <v-text-field
              density="compact"
              placeholder="Введите свой логин"
              prepend-inner-icon="mdi-email-outline"
              variant="outlined"
          ></v-text-field>

          <div
              class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between"
          >
            Пароль
          </div>

          <v-text-field
              :append-inner-icon="'mdi-eye'"
              density="compact"
              placeholder="Введите пароль"
              prepend-inner-icon="mdi-lock-outline"
              variant="outlined"
          ></v-text-field>

          <v-btn class="mb-8" color="blue" size="large" variant="tonal" block>
            Войти
          </v-btn>
        </v-card>
      </div>
    </template>
  </v-app>
</template>

<script>
export default {
  data: () => ({ value: 1 }),
}
</script>

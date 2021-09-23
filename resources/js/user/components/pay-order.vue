<template>

</template>

<script>
export default {
  name: "pay-order",
  data () {
    return {
      windowsLoader: false,
    }
  },
  props: {
    order: Object
  },
  methods: {
    pay () {
      let widget = new cp.CloudPayments({ language: 'ru-RU'} );
      widget.pay('charge', // или 'charge'
        { //options
          publicId: 'pk_e531fbe6a10b284d414ce62fbf852', //id из личного кабинета
          description: '', //назначение
          amount: Number(this.order.price) + Number(this.order.ship_price) - Number(this.order.sale), //сумма
          currency: 'KZT', //валюта
          invoiceId: this.order.no, //номер заказа  (необязательно)
          accountId: this.order.user.email, //идентификатор плательщика (необязательно)
          skin: "modern", //дизайн виджета (необязательно)
        },
        {
          onSuccess: (options) => { // success
            //действие при успешной оплате
            this.windowsLoader = true
            window.axios.post('/order/update/status', {
              order: this.order.id,
              state: 'pending'
            })
              .then(response => {
                window.location = '/order'
              })
              .catch(error => {
                window.Swal.fire({
                  icon: "error",
                  title: 'Ошибка',
                  text: 'Возникла системная ошибка подтверждения оплаты. Обратитесь к администрации'
                })
              })
          },
          onFail: (reason, options) => { // fail
            //действие при неуспешной оплате
            window.Swal.fire({
              title: 'Вы не оплатили заказ!',
              text: 'Вы сможете оплатить свой заказ, иначе он удалится',
              icon: 'error',
              confirmButtonText: 'Далее'
            })
              .then((result) => {
                window.location = '/order'
              })
          }
        }
      )
    },
  }
}
</script>

<style scoped>
</style>

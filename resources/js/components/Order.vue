<template>
  <div class="main">
    <div class="container">
      <p class="title">Fill out this form</p>
      <form @submit.prevent="orderProduct()">
        <div class="form-group row">
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputName" v-model="order.name" placeholder="Name">
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputMobile" v-model="order.mobile" placeholder="10-digit mobile number">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputPincode" v-model="order.pincode" placeholder="Pincode">
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputLocality" v-model="order.locality" placeholder="Locality">
          </div>
        </div>
        <div class="form-group">
          <textarea rows="5" class="col-sm-10" v-model="order.address" placeholder="Address (Area and Street)"></textarea>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputPincode" v-model="order.city" placeholder="City/District/Town">
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputLocality" v-model="order.state" placeholder="State">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputPincode" v-model="order.landmark" placeholder="Landmark (Optional)">
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputLocality" v-model="order.alternate_mobile" placeholder="Alternate Phone (Optional)">
          </div>
        </div>
        <label>Address Type</label>
        <div class="form-group row text-muted">
          <div class="col-sm-5">
            <input type="radio" name="type" value="home" v-model="order.address_type"> Home (All day delivery)
          </div>
          <div class="col-sm-5">
            <input type="radio" name="type" value="work" v-model="order.address_type"> Work (Delivery between 10 AM - 5 PM)
          </div>
        </div>
        <p class="payment">Payment Details</p>
        <input type="text" class="form-control" id="inputCardnumber" v-model="price">
        <div class="form-group row">
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputCardname" v-model="order.name_on_card" placeholder="Name on card">
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="inputCardnumber" v-model="order.card_number" placeholder="Credit / debit card number">
          </div>
        </div>
        <button type="submit" class="btn btn-success">Complete Order</button>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    postData: {
      type: Array,
      required: true
    },
  },
  data() {
    return {
      list: [],
      price: '',
      order: {
        name: '',
        mobile: '',
        pincode: '',
        locality: '',
        address: '',
        city: '',
        state: '',
        landmark: '',
        alternate_mobile: '',
        address_type: '',
        name_on_card: '',
        card_number: '',
        amount: '',
      },
    };
  },
  mounted() {
    console.log('mounted');
    if(this.postData)
    {
      this.list = this.postData
    }
    this.fetchPrice()
  },
  methods: {
    async orderProduct()
    {
      let data = {
        name: this.order.name,
        mobile: this.order.mobile,
        pincode: this.order.pincode,
        locality: this.order.locality,
        address: this.order.address,
        city: this.order.city,
        state: this.order.state,
        landmark: this.order.landmark,
        alternate_mobile: this.order.alternate_mobile,
        address_type: this.order.address_type,
        amount: this.price,
        name_on_card: this.order.name_on_card,
        card_number: this.order.card_number
      }
      console.log(data);
      axios.post('/order', data)
        .then((res) => {
          this.order.name = '';
          this.order.mobile ='';
          this.order.pincode = '';
          this.order.locality = '';
          this.order.address = '';
          this.order.city = '';
          this.order.state = '';
          this.order.landmark = '';
          this.order.alternate_mobile = '';
          this.order.address_type = '';
          this.order.name_on_card = '';
          this.order.price = '';
          this.order.card_number = '';
          this.list.push(res.data.order)
        })
        .catch((err) => console.error(err));
    },
    async fetchPrice()
    {
      let res = await axios.get('/product')
      if (res.data) {
        this.price = res.data.amount
      }
    }
  }
};
</script>
<style>
  .title {
    font-size: 30px;
    /* background-color: blue; */
  }
  .payment {
    margin-top: 40px;
    font-size: 25px;
    font-weight: bold;
  }
  .order {
    background-color:#3CB371;
    color: white;
  }
</style>

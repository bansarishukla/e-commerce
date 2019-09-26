<template>
  <div class="main">
    <div class="container">
      <p class="title">Fill out this form</p>
      <form @submit.prevent="orderProduct()">
        <div class="form-group row">
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              v-model="order.name"
              placeholder="Name"
              :class="{ 'is-invalid': submitted && $v.order.name.$error }"
            >
            <div v-if="submitted && $v.order.name.$error" class="invalid-feedback">
              <span v-if="!$v.order.name.required">Name is required</span>
              <span v-if="!$v.order.name.alpha">Only characters are allowed!</span>
            </div>
          </div>
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="mobile"
              name="mobile"
              v-model="order.mobile"
              placeholder="10-digit mobile number"
              :class="{ 'is-invalid': submitted && $v.order.mobile.$error }"
            >
            <div v-if="submitted && $v.order.mobile.$error" class="invalid-feedback">
              <span v-if="!$v.order.mobile.required">Phone is required</span>
              <span v-if="!$v.order.mobile.minLength">Phone must be at least 10 digits</span>
              <span v-if="!$v.order.mobile.numeric">Only ditits are allowed!</span>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="pincode"
              name="pincode"
              v-model="order.pincode"
              placeholder="Pincode"
              :class="{ 'is-invalid': submitted && $v.order.pincode.$error }"
            >
            <div v-if="submitted && $v.order.pincode.$error" class="invalid-feedback">
              <span v-if="!$v.order.pincode.required">Pincode is required</span>
              <span v-if="!$v.order.pincode.numeric">Only ditits are allowed!</span>
            </div>
          </div>
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="locality"
              name="locality"
              v-model="order.locality"
              placeholder="Locality"
              :class="{ 'is-invalid': submitted && $v.order.locality.$error }"
            >
            <div v-if="submitted && !$v.order.locality.required" class="invalid-feedback">Locality is required</div>
          </div>
        </div>
        <div class="form-group">
          <textarea
            rows="5"
            class="col-sm-10"
            v-model="order.address"
            placeholder="Address (Area and Street)"
            id="address"
            name="address"
            :class="{ 'is-invalid': submitted && $v.order.address.$error }"
          />
          <div v-if="submitted && !$v.order.address.required" class="invalid-feedback">Address is required</div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="city"
              name="city"
              v-model="order.city"
              placeholder="City/District/Town"
              :class="{ 'is-invalid': submitted && $v.order.city.$error }"
            >
            <div v-if="submitted && !$v.order.city.required" class="invalid-feedback">City is required</div>
          </div>
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="state"
              name="state"
              v-model="order.state"
              placeholder="State"
              :class="{ 'is-invalid': submitted && $v.order.state.$error }"
            >
            <div v-if="submitted && !$v.order.state.required" class="invalid-feedback">State is required</div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="landmark"
              name="landmark"
              v-model="order.landmark"
              placeholder="Landmark"
              :class="{ 'is-invalid': submitted && $v.order.landmark.$error }"
            >
            <div v-if="submitted && !$v.order.landmark.required" class="invalid-feedback">Landmark is required</div>
          </div>
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="alternate_mobile"
              name="alternate_mobile"
              v-model="order.alternate_mobile"
              placeholder="Alternate Phone"
              :class="{ 'is-invalid': submitted && $v.order.alternate_mobile.$error }"
            >
            <span v-if="!$v.order.alternate_mobile.required">Phone is required</span>
            <span v-if="!$v.order.alternate_mobile.numeric">Only ditits are allowed!</span>
            <span v-if="!$v.order.alternate_mobile.minLength">Phone must be at least 10 digits</span>
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
        <div class="col-sm-5">
          <input type="hidden" name="product_id" class="form-control" v-model="order.product_id">
        </div>
        <p class="payment">Payment Details</p>
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="text" class="form-control" v-model="order.price">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="name_on_card"
              name="name_on_card"
              v-model="order.name_on_card"
              placeholder="Name on card"
              :class="{ 'is-invalid': submitted && $v.order.name_on_card.$error }"
            >
            <div v-if="submitted && !$v.order.name_on_card.required" class="invalid-feedback">Name is required</div>
          </div>
          <div class="col-sm-5">
            <input
              type="text"
              class="form-control"
              id="card_number"
              name="card_number"
              v-model="order.card_number"
              placeholder="Credit / debit card number"
              :class="{ 'is-invalid': submitted && $v.order.card_number.$error }"
            >
            <div v-if="submitted && !$v.order.card_number.required" class="invalid-feedback">Card number is required</div>
          </div>
        </div>
        <button type="submit" class="btn btn-success">Complete Order</button>
      </form>
    </div>
  </div>
</template>
<script>
import { required, numeric, alpha, minLength } from "vuelidate/lib/validators";
export default {
  props: {
    postData: {
      type: Array,
      required: true
    },
    product: {
      type: Object,
      required: true
    },
  },
  data() {
    return {
      list: [],
      productList: [],
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
        product_id: '',
        price: '',
      },
      submitted: false
    };
  },
  validations: {
    order: {
      name: {
        required,
        alpha
      },
      mobile: {
        required,
        minLength: minLength(10),
        numeric
      },
      pincode: {
        required,
        numeric
      },
      locality: {
        required
      },
      address: {
        required
      },
      city: {
        required
      },
      state: {
        required
      },
      landmark: {
        required
      },
      alternate_mobile: {
        required,
        minLength: minLength(10),
        numeric
      },
      name_on_card: {
        required
      },
      card_number: {
        required
      }
    }
  },
  mounted() {
    console.log('mounted', this.product);
    if(this.postData)
    {
      this.list = this.postData
    }
    this.order.product_id = this.product.id
    this.order.price = this.product.price
  },
  methods: {
    async orderProduct()
    {
      this.submitted = true;
      this.$v.order.$touch()
      if (this.$v.$invalid) {
        return false
      }
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
        name_on_card: this.order.name_on_card,
        card_number: this.order.card_number,
        product_id: this.order.product_id,
        price: this.order.price
      }
      console.log(data);
      let res = await axios.post('/order', data)
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
        this.order.card_number = '';
        this.order.product_id = '';
        this.order.price = '';
        this.list.push(res.data.order)
        this.$v.order.$reset()

        if(res.data.succsess) {
          this.$toaster.success('Product is added successfully')
          return true
        }
        this.$toaster.error('error');
        return false
    },
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

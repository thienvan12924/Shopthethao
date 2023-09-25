new Vue({
    el: '#cartMini',
    data: {
        listCart: [],
    },
    created() {
        this.loadTable();
    },
    methods: {
        remove(id) {
            axios
                .get('/client/cart/remove/' + id)
                .then((res) => {
                    //toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
                    this.loadTable();
                });
        },
        loadTable() {
            axios
                .get('/client/cart/data')
                .then((res) => {
                    this.listCart = res.data.chiTiet;
                    this.loadTable();
                });
        },

        totalRequest() {
            var total = 0;
            for (var i in this.listCart) {
                total = total + this.listCart[i].thanh_tien;
            }
            return total;
        },

        donGia(x, y) {
            if (x == 0) {
                return y;
            } else {
                return x;
            }
        },
        thanhTien(v) {
            if (v.gia_khuyen_mai == 0) {
                return this.donGia(v.gia) * v.so_luong_mua;
            } else {
                return this.donGia(v.gia_khuyen_mai) * v.so_luong_mua;
            }
        },

        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },

        count() {
            count = 0;
            for (var i in this.listCart) {
                count += 1;
            }
            return count;
        }
    },
});

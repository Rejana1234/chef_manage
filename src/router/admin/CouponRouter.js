import Coupon from '../../views/admin/Coupon/Coupon';
import AddCoupon from '../../views/admin/Coupon/AddCoupon';
export default[
    {
        path:'coupon',
        name: 'Coupon',
        component: Coupon
    },
    {
        path:'addcoupon',
        name:'AddCoupon',
        component: AddCoupon
    },
    {
        path: 'edit_coupon/:id',
        name: 'EditCoupon',
        component: () => import('../../views/admin/Coupon/EditCoupon.vue')
    }
]
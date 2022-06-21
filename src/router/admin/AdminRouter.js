import store from '@/store';
import Dashboard from '../../views/admin/Mydashboard';
import ChefRouter from './ChefRouter';
import CouponRouter from './CouponRouter';
import PackageRouter from './PackageRouter';
import ProductRouter from './ProductRouter';
import UserRouter from './UserRouter';

//child router in admin

export default[
    {
        path: '/dashboard',
        component: Dashboard,
        children: [
            {
                path: '',
                name: 'Home',
                component: () => import('../../views/admin/Home.vue')
            },

            ...UserRouter,
            ...CouponRouter,
            ...ChefRouter,
            ...ProductRouter,
            ...PackageRouter,

        ],
        beforeEnter(to, form, next){
            if (!store.getters['AuthToken']){
                return next({
                    name: 'Login'
                });
            }else{
                next();
            }
        },
    }
]
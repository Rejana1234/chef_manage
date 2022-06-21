import Login from '../../views/auth/Login'
import ForgetPassword from '../../views/auth/ForgetPassword'
import ResetPassword from '../../views/auth/ResetPassword'

export default [
    {
        path:'/login' ,
        name: 'Login',
        component: Login
    },
    {
        path: '/forget-password',
        name: 'ForgetPassword',
        component: ForgetPassword
    },
    {
        path: '/reset-password',
        name: 'ResetPassword',
        component: ResetPassword
    }
]
import User from '../../views/admin/User/User';
import AddUser from '../../views/admin/User/AddUser';
export default[
    {
        path:'user',
        name: 'User',
        component: User
    },
    {
        
            path:'adduser',
            name:'AddUser',
            component: AddUser
    
    }
]
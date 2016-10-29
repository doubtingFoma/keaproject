using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_01
{
    class Program
    {
        static void Main(string[] args)
        {
            //Creating a new customer type variable. It belongs to the customer class, have all the properties as the customer class.
            //For the constructor, please open the "Customer.cs" file
            Customer c1 = new Customer();
            Customer c2 = new Customer();
            Customer c3 = new Customer();

            //giving a value to the username property of the variables
            c1.username = "Kukucs1"; //Fun fact of the day: Kukucs means peek-a-boo!
            c2.username = "Kukucs2";
            c3.username = "Kukucs3";

            //you can also give them an age, weight, etc. (whatever is defined in the customer class)
            c1.age = 20;

            //writing the usernames in the console
            Console.WriteLine(c1.username);
            Console.WriteLine(c2.username);
            Console.WriteLine(c3.username);



            Console.ReadKey();
        }
    }
}

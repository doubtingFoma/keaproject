using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_02
{
    class Program
    {
        static void Main(string[] args)
        {
            //Creating a new customer type variable. It belongs to the customer class, have all the properties as the customer class.
            //For the constructor, please open the "Customer.cs" file

            List<Customer> listOfCustomers = new List<Customer>();
            Customer c1 = new Customer();
            c1.age = 20;
            c1.alive = true;
            c1.username = "kukucs1";

            Customer c2 = new Customer();
            c2.age = 30;
            c2.alive = false;
            c2.username = "kukucs2";

            listOfCustomers.Add(c1);
            listOfCustomers.Add(c2);

            for (int i = 0; i < listOfCustomers.Count; i++)
            {
                //we execute the buy method of the current customer
                //since we wrote the property in the customer class, we will get the current object's name written in the console
                listOfCustomers[i].buy();
                //some additional information about the current customer
                Console.WriteLine($"Alive: {listOfCustomers[i].alive}, Age: {listOfCustomers[i].age}");
            }


            Console.ReadKey();
        }
    }
}

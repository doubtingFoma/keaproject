using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_03
{
    class Program
    {
        static void Main(string[] args)
        {
            //Creating a new variable which is an "Item" type
            Item Apple = new Item();
            //give a name and a price
            Apple.Name = "apple";
            Apple.Price = 10;

            //Creating a new variable which is an "Item" type
            Item Pear = new Item();
            //give a name and a price
            Pear.Name = "Pear";
            Pear.Price = 20.54f;

            //create a customer which is Customer type
            Customer User1 = new Customer();
            User1.username = "user1@fake.china";
            
            //user 1 buys some apple, so it puts the apple Item into a list, which is an attribute of the Customer
            User1.Buy(Apple);
            //same for pear
            User1.Buy(Pear);

            //Executes the showcart method attribute of the Customer, writes the items in the console
            User1.ShowCart();


            Console.ReadKey();
        }

    }
                 

}

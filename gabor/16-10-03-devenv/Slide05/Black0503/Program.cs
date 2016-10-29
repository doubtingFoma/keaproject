using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0503
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create a couple of items
            Item item1 = new Item();
            item1.name = "Nutella";
            item1.price = 500;

            Item item2 = new Item();
            item2.name = "Bacon";
            item2.price = 300;

            Item item3 = new Item();
            item3.name = "Potato";
            item3.price = 100;

            // Create customers
            Customer cust1 = new Customer();
            cust1.name = "Gabor";
            cust1.Buy(item1);
            cust1.Buy(item2);
            cust1.Buy(item3);

            cust1.Checkout();
        }
    }
}

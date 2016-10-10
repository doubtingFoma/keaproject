using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0503
{
    class Customer
    {
        public string name;
        public List<Item> cart = new List<Item>();

        // Add something to customer's cart
        public void Buy(Item item)
        {
            Console.WriteLine($"{this.name} buys {item.name}  for {item.price}");
            this.cart.Add(item);
        }

        // Output the content of the customer's cart
        public void Checkout()
        {
            Console.WriteLine($"{ this.name}'s cart contains: ");
            for (int i = 0; i < this.cart.Count; i++)
            {
                Console.WriteLine($"- {this.cart[i].name}, price: {this.cart[i].price}");
            }
        }
    }
}

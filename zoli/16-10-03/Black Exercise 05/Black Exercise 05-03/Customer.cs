using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_03
{
    class Customer
    {
        //this is a simple string property for the whole class
        public string username;
        public int age;
        public bool alive;
        public float weight;
        //you can use these properties for every customer type variable

        //this is a shopping cart that stores the bought items
        public List<Item> Cart = new List<Item>();

        //this is a method that is specific to this class.
        public void Buy(Item BoughtItem)
        {
            //we use the "this" to indicate that it's this class's item
            //we can use them if we want, but it's not neccesary (visual studio suggests to remove them to simplify the code)
            this.Cart.Add(BoughtItem);
        }

        public void ShowCart()
        {
            //write every elemnt of the Cart list to the console
            for (int i = 0; i < this.Cart.Count(); i++)
            {
                
                Console.WriteLine($"{this.Cart[i].Name}: {this.Cart[i].Price}");
            }
        }
    }
}

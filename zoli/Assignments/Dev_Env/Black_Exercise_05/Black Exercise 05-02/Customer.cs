using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_02
{
    class Customer
    {
        //this is a simple string property for the whole class
        public string username;        
        public int age;
        public bool alive;
        public float weight;
        //you can use these properties for every customer type variable

        //this is a method that is specific to this class.
        public void buy()
        {
            //you can use the class's properties just like any other variables
            Console.WriteLine($"Customer ({username}) bought something");
        }
    }
}

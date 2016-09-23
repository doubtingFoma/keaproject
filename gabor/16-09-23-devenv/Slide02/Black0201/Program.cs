using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0201
{
    class Program
    {
        static void Main(string[] args)
        {   
            // Calling methods
            Console.WriteLine("Hello from Black201");
            bool AbbyAndBob = CanTheyRide(135, 175);
            bool BobAndCharlie = CanTheyRide(175, 55);
            bool CharlieAndDawn = CanTheyRide(55, 45);
        }

        // Measures 2 given weight values and returns whether they can ride or not
        public static bool CanTheyRide(int firstPerson, int secondPerson)
        {
            const int maxWeight = 300;
            const int minWeight = 100;
            bool CanTheyRide = ((firstPerson + secondPerson > minWeight) && (firstPerson + secondPerson < maxWeight));
            string CanTheyRideMessage = CanTheyRide ? "They can ride" : "They cannot ride";
            Console.WriteLine(CanTheyRideMessage);
            return CanTheyRide;
        
        }
    }
}

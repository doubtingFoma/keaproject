using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise
{
    class Program
    {
        static void Main(string[] args)
        {

            int Abby = 135;
            int Bob = 175;
            int Charlie = 55;
            int Dawn = 45;

            Console.WriteLine("Abby and Bob can ride: {0}", CanRide(Abby, Bob));
            Console.WriteLine("Abby and Charlie can ride: {0}", CanRide(Abby, Charlie));
            Console.WriteLine("Abby and Dawn can ride: {0}", CanRide(Abby, Dawn));
            Console.WriteLine("Bob and Charlie can ride: {0}", CanRide(Bob, Charlie));
            Console.WriteLine("Bob and Dawn can ride: {0}", CanRide(Bob, Dawn));
            Console.WriteLine("Charlie and Dawn can ride: {0}", CanRide(Charlie, Dawn));


            //Wait for a key press to actually 
            Console.ReadKey();
        }
        
        //I just created a function that takes two parameters (two people) and returns with a boolean if they can ride together.
        //Sorry, it was easier...
        static bool CanRide (int PersonA, int PersonB)
        {
            int MinimumWeight = 100, Maximumweight = 300;
            int TotalWeight = PersonA + PersonB;

            bool accepted = false;

            //We assign a value to the "accepted" variable by the conditional operators
            accepted = (TotalWeight <= Maximumweight && TotalWeight >= MinimumWeight) ? true : false;

            //This is the same as the above statement
            /*
            if (TotalWeight >= MinimumWeight && TotalWeight <= Maximumweight)
            {
                accepted = true;
            }
            */            
            return accepted;
            
        }
    }
}
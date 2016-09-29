using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_03
{
    class Program
    {
        static void Main(string[] args)
        {
            int N1, N2, N3;
            
            //we try to convert number 1 to an integer until it is successful
            Console.Write("Number 1: ");
            while ( !Int32.TryParse(Console.ReadLine(), out N1) )
            {
                Console.Write("Number 1: ");
            }

            Console.Write("Number 2: ");
            while ( !Int32.TryParse(Console.ReadLine(), out N2) )
            {
                Console.Write("Number 2: ");
            }

            Console.Write("Number 3: ");
            while ( !Int32.TryParse(Console.ReadLine(), out N3) )
            {
                Console.Write("Number 3: ");
            }

            //we first get the larger number between N1 and N2, and then compare that to N3. This way, we get the largest of all
            Console.WriteLine("The largest number is {0}", GetMax( GetMax(N1, N2), N3 ) );


            Console.ReadKey();

        }

        static int GetMax(int numberOne, int numberTwo)
        {
            //I hope this is self explanatory
            if (numberOne > numberTwo)
            {
                return numberOne;
            }
            else 
            {
                //if they are equal, we can return any of them, because....I don't know....they are equal?!
                return numberTwo;
            }
        }
    }
}

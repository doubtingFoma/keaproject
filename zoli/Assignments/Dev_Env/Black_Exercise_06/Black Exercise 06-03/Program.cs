using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_03
{
    class Program
    {
        static void Main(string[] args)
        {
            Car BMWX5 = new Car();
            Bicycle Gepida = new Bicycle();
            Vehicle RandomVehicle = new Vehicle();
                       
            RandomVehicle.Indicate(true);
            BMWX5.Indicate(false);
            Gepida.Indicate(true);

            Console.ReadKey();
        }

        class Vehicle
        {
            public int Speed;
            public int Accelerate;
            public int Decelerate;
            //The virtual modifier tells the compiler that when any class derived from class Vehicle is used (eg: a Car), an override method should be called.
            public virtual void Indicate(bool indication)
            {
                if (indication)
                {
                    Console.WriteLine("Turning left");
                }
                else
                {
                    Console.WriteLine("Turning right");
                }

            }
        }

        class Car : Vehicle
        {
            public void HonkHorn()
            {
                Console.WriteLine("Honk Honk");
            }
            //the override method overrides the virtual one
            public override void Indicate (bool indication)
            {
                if (indication)
                {
                    Console.WriteLine("Flashing left indicator");
                }
                else
                {
                    Console.WriteLine("Flashing right indicator");
                }
            }
                
        }

        class Bicycle : Vehicle
        {
            public void RingBell()
            {
                Console.WriteLine("Ring Ring");
            }

            public override void Indicate(bool indication)
            {
                if (indication)
                {
                    Console.WriteLine("Raising left arm");
                }
                else
                {
                    Console.WriteLine("Raising right arm");
                }
            }

        }
    }
}

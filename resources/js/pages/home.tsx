import AppLogoIcon from '@/components/app-logo-icon';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import {
    Carousel,
    CarouselContent,
    CarouselItem,
    CarouselNext,
    CarouselPrevious,
} from '@/components/ui/carousel';
import { login, register } from '@/routes';
import { Head, Link } from '@inertiajs/react';

export default function Home() {
    return (
        <>
            <Head>
                <title>Rifas do Rama</title>
            </Head>
            <div className="flex min-h-screen min-w-screen flex-col items-center bg-gradient-to-b from-green-900 to-green-700">
                <header className="top-0 right-0 left-0 mx-auto flex w-full items-center justify-between p-6 text-sm text-white">
                    <div className="mb-1 flex h-12 w-24 items-center justify-center rounded-md">
                        <AppLogoIcon className="size-24 fill-current text-[var(--foreground)] dark:text-white" />
                    </div>
                    <nav className="flex items-center justify-end gap-4">
                        <Link href={login()} className="hover:underline">
                            Login
                        </Link>
                        <Link
                            href={register()}
                            className="rounded bg-white/10 px-4 py-2 hover:bg-white/20"
                        >
                            Registrar
                        </Link>
                    </nav>
                </header>
                <div className="flex flex-col items-center px-6 py-3 text-white">
                    <Carousel>
                        <CarouselContent>
                            <CarouselItem>
                                <Card className="w-full md:w-2xl sm:w-full bg-white text-black">
                                    <CardHeader>
                                        <CardTitle>
                                            Pallet Cerveja & Carvão
                                        </CardTitle>
                                        <CardDescription className="text-green-700">
                                            Campanha #0001
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent className="align-center flex flex-col items-center text-center">
                                        <div className="relative h-40 w-full overflow-hidden md:h-50 md:w-96 sm:h-50 sm:w-64">
                                            <img
                                                src="/assets/images/premio.jpg"
                                                alt="Prêmio da rifa"
                                                className="absolute inset-0 h-full w-full object-cover object-center"
                                            />
                                            <span className="animate-pulse font-extrabold text-white bg-green-500 py-1 px-4 rounded-3xl absolute bottom-5 right-5">Corre que está acabando</span>
                                        </div>

                                        <h1 className="font-extrabold text-green-700">
                                            Rifa - 1 Pallet de Cerveja e 1
                                            Pallet de Carvão
                                        </h1>
                                        <p className="font-thin text-gray-600">
                                            Heineken long neck 350ml - 96
                                            unidades
                                            <br />
                                            Carvão vegetal 5kg - 40 sacos
                                        </p>
                                        <p>
                                            <strong>R$ 0,40</strong> por número
                                        </p>
                                    </CardContent>
                                    <CardFooter className="flex justify-center">
                                        <Button className="bg-green-700 text-white hover:bg-green-800">
                                            Comprar
                                        </Button>
                                    </CardFooter>
                                </Card>
                            </CarouselItem>
                        </CarouselContent>
                        <CarouselPrevious />
                        <CarouselNext />
                    </Carousel>
                </div>
            </div>
        </>
    );
}

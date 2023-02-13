import { SearchInput } from '../organisms/SearchInput';
import { Box } from '@chakra-ui/react';
import { Logo } from '@/components/atoms/Logo';
import { MainText } from '../atoms/Text/MainText';

export const HeroSection = () => {
  return (
    <Box h="60vh" background="#AF011C">
      <Box width="600px" m="0 auto" pt="200px">
        <MainText>あなたの推しの一杯を見つけよう</MainText>
        <Logo />
        <Box display="flex">
          <SearchInput />
        </Box>
      </Box>
    </Box>
  );
};
